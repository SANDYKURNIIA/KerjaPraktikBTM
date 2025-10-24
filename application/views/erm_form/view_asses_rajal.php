
<!-- JS only (CSS sudah terintegrasi otomatis di SweetAlert2) -->
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Assesment Perawat Jalan</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">

				<div class="panel-body">
					<div class="form-wrap">


						<div class="form-group">
							<div class="col-md-3">
								<label class="control-label mb-10 text-left">No.RM<span class="help"></span></label>
								<input type="text" disabled class="form-control" value="<?= $no_rm ?>" id="inNoRM">
								<input type="hidden" class="form-control" value="<?= urlencode(base64_encode($id_pelayanan)) ?>" id="inPel">
								<input type="hidden" class="form-control" value="<?= urlencode(base64_encode($id_history)) ?>" id="inHis">
								<input type="hidden" class="form-control" value="<?= $jenis_pelayanan ?>" id="inJenPel">

							</div>
						</div>

						<div class="form-group">
							<div class="col-md-3">
								<label class="control-label mb-10 text-left">Nama<span class="help"></span></label>
								<input type="text" disabled class="form-control" value="<?= $nama ?>" id="inNama">
								<span class="help-block"></span>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-3">
								<label class="control-label mb-10 text-left">Tgl Lahir / Umur<span class="help"></span></label>
								<input type="text" disabled class="form-control" value="<?php
																						setlocale(LC_ALL, 'id_ID');

																						date_default_timezone_set('Asia/Jakarta');
																						$time = strtotime($tgl_lahir);
																						$date = strftime(" %d %B %Y ", $time);
																						echo $date  . '(' . getAge($tgl_lahir) . ')' ?>">
								<span class="help-block"></span>
							</div>
						</div>

						<div class="form-group ">
							<div class="col-md-3">
								<label class="control-label mb-10 text-left">Jenis Kelamin</label>
								<input type="text" disabled class="form-control" value="<?= $jenis_kelamin ?>" id="inJk">
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3">
								<label class="control-label mb-10 text-left">Jam/ Tanggal Masuk <span class="help"></span></label>
								<input type="text" id="inTglMasuk" disabled class="form-control" value="<?php
																										setlocale(LC_ALL, 'id_ID');

																										date_default_timezone_set('Asia/Jakarta');
																										$time = strtotime($tgl_masuk);
																										$date = strftime(" %d %B %Y ", $time);
																										echo $date ?>">
								<span class="help-block"></span>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-3">
								<label class="control-label mb-10 text-left">Cara Bayar<span class="help"></span></label>
								<input type="text" disabled class="form-control" id="inCaraBayar" value="<?= $cara_bayar ?>">
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">

							<div class="form-group ">
								<!-- Pengkajian keperawatan -->
								<div class="form-group">
									<div class="col-md-12">
										<center>
											<h4 style="margin-top: 30px;"><strong>
													<label class="control-label mb-10 text-left"><b>PENGKAJIAN
															KEPERAWATAN</b><span class="help"></span></label></strong>
											</h4>
										</center>
									</div>
									<div class="col-md-12">
										<h5 style="margin-top: 30px;"><strong>
												<label class="control-label mb-10 text-left"><b>Informasi Umum</b><span class="help"></span></label>
											</strong></h5>
									</div>

									<div class="col-md-12">
										<div class="form-group ">
											<div class="row">
												<div class="col-md-2">
													<label class="control-label mb-10 text-left">Kebutuhan
														Khusus:</label>
													<span id="kebutuhan_khusus" class="text-danger"></span>
												</div>
												<div class="col-md-2">
													<div class="radio-button radio-button-primary">
														<input id="kebutuhan_khusus1" type="radio" name="kebutuhan_khusus" value="Tidak Ada" checked>
														<label class="control-label" for="kebutuhan_khusus1">
															Tidak Ada
														</label>
													</div>
												</div>
												<div class="col-md-2">
													<div class="radio-button radio-button-primary">
														<input id="alat_bantu_dengar" type="radio" name="kebutuhan_khusus" value="Alat Bantu Dengar" >
														<label class="control-label" for="alat_bantu_dengar">
															Alat Bantu Dengar
														</label>
													</div>
												</div>
												<div class="col-md-2">
													<div class="radio-button radio-button-primary">
														<input id="kacamata" type="radio" name="kebutuhan_khusus" value="Kacamata">
														<label class="control-label" for="kacamata">
															kacamata
														</label>
													</div>
												</div>
												<div class="col-md-2">
													<div class="radio-button radio-button-primary">
														<input id="tongkat" type="radio" name="kebutuhan_khusus" value="tongkat">
														<label class="control-label" for="tongkat">
															tongkat
														</label>
													</div>
												</div>
												<div class="col-md-2">
													<div class="radio-button radio-button-primary">
														<input id="gigi_palsu" type="radio" name="kebutuhan_khusus" value="gigi Palsu">
														<label class="control-label" for="gigi_palsu">
															Gigi Palsu
														</label>
													</div>
												</div>
												<div class="col-md-2">
													<div class="radio-button radio-button-primary">
														<input id="	dll" type="radio" name="kebutuhan_khusus" value="DLL">
														<label class="control-label" for="	dll">
															DLL
														</label>
													</div>
												</div>
												<span class="help-block"></span>
											</div>
										</div>

										<div class="col-md-12">
											<h5 style="margin-top: 30px;"><strong>
													<label class="control-label mb-10 text-left"><b>Pemeriksaan
															Fisik</b><span class="help"></span></label>
												</strong></h5>
										</div>
										<div class="form-group ">

											<div class="form-group">
												<div class="col-md-4">
													<label class="control-label mb-10 text-left">Tekanan Darah<span class="help"></span></label>
													<span id="td_error" class="text-danger">*</span>
													<div class="has-success">
														<input type="text" class="form-control" name="tekanan_darah" placeholder="mmHg" value="0">
														<span class="help-block"></span>
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="col-md-4">
													<label class="control-label mb-10 text-left">Suhu<span class="help"></span></label>
													<span id="suhu_error" class="text-danger">*</span>
													<div class="has-success">
														<input type="text" class="form-control" name="suhu" placeholder="Celsius" value="0">
														<span class="help-block"></span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-4">
													<label class="control-label mb-10 text-left">Berat Lahir<span class="help"></span></label>
													<!-- <span id="berat_badan_error" class="text-danger">*</span> -->
													<div class="has-success">
														<input type="text" class="form-control" name="berat_lahir" placeholder="gram" value="0">
														<span class="help-block"></span>
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="col-md-4">
													<label class="control-label mb-10 text-left">Nadi<span class="help"></span></label>
													<span id="nadi_error" class="text-danger">*</span>
													<div class="has-success">
														<input type="text" class="form-control" name="frequensi_nadi" placeholder="x/menit" value="0">
														<span class="help-block"></span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-4">
													<label class="control-label mb-10 text-left">Tinggi Badan<span class="help"></span></label>
													<span id="tinggi_badan_error" class="text-danger">*</span>
													<div class="has-success">
														<input type="text" class="form-control" name="tinggi_badan" placeholder="Cm" value="0">
														<span class="help-block"></span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-4">
													<label class="control-label mb-10 text-left">Lingkar Kepala<span class="help"></span></label>
													<span id="tinggi_badan_error" class="text-danger">*</span>
													<div class="has-success">
														<input type="text" class="form-control" name="lingkar_kepala" placeholder="Cm" value="0">
														<span class="help-block"></span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-4">
													<label class="control-label mb-10 text-left">Pernafasan<span class="help"></span></label>
													<span id="nafas_error" class="text-danger">*</span>
													<div class="has-success">
														<input type="text" class="form-control" name="frequensi_nafas" placeholder="x/menit" value="0">
														<span class="help-block"></span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-4">
													<label class="control-label mb-10 text-left">Berat Badan<span class="help"></span></label>
													<span id="berat_badan_error" class="text-danger">*</span>
													<div class="has-success">
														<input type="text" class="form-control" name="berat_badan" placeholder="Kg" value="0">
														<span class="help-block"></span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-4">
													<label class="control-label mb-10 text-left">Lingkar Lengan<span class="help"></span></label>
													<span id="berat_badan_error" class="text-danger">*</span>
													<div class="has-success">
														<input type="text" class="form-control" name="lingkar_lengan" placeholder="Kg" value="0">
														<span class="help-block"></span>

													</div>
												</div>
											</div>
										</div>
									</div>

									<!----bagian ASESMEN AWAL KEPERAWATAN/KEBIDANAN-->
									<div class="form-group" id="spirit" style="display: block;">
										<div class="col-md-12">
											<h5 style="margin-top: 30px;"><strong>
													<label class="control-label mb-10 text-left"><b>Riwayat Psikososial,
															Spiritual dan
															Ekonomi<b /><span class="help"></span></label>
												</strong>
											</h5>
										</div>
										<div class="col-md-12">
											<div class="form-group ">
												<div class="row">
													<div class="col-md-2">
														<label class="control-label mb-10 text-left">Bicara :</label>
														<span id="Bicara" class="text-danger"></span>
													</div>
													<div class="col-md-2">
														<div class="radio-button radio-button-primary">
															<input id="bicara_jelas" type="radio" name="bicara" value="Jelas" checked>
															<label class="control-label" for="bicara01">
																Jelas
															</label>
														</div>
													</div>
													<div class="col-md-2">
														<div class="radio-button radio-button-primary">
															<input id="bicara_tidak" type="radio" name="bicara" value="Tidak">
															<label class="control-label" for="bicara02">
																Tidak
															</label>
														</div>
													</div>
													<span class="help-block"></span>
												</div>
											</div>
											<div class="form-group ">
												<div class="row">
													<div class="col-md-2">
														<label class="control-label mb-10 text-left">Komunikasi
															:</label>
														<span id="komunikasi" class="text-danger"></span>
													</div>
													<div class="col-md-2">
														<div class="radio-button radio-button-primary">
															<input id="komunikasi_verbal" type="radio" name="komunikasi" value="Verbal" checked>
															<label class="control-label" for="komunikasi_verbal">
																Verbal
															</label>
														</div>
													</div>
													<div class="col-md-2">
														<div class="radio-button radio-button-primary">
															<input id="komunikasi_nonverbal" type="radio" name="komunikasi" value="Non Verbal">
															<label class="control-label" for="komunikasi_nonverbal">
																Non Verbal
															</label>
														</div>
													</div>
													<div class="col-md-2">
														<div class="radio-button radio-button-primary">
															<input id="komunikasi_apatis" type="radio" name="komunikasi" value="Apatis">
															<label class="control-label" for="komunikasi_apatis">
																Apatis
															</label>
														</div>
													</div>
													<span class="help-block"></span>
												</div>
											</div>
											<div class="form-group ">
												<div class="row">
													<div class="col-md-2">
														<label class="control-label mb-10 text-left">Status Psikologis
															:</label>
														<span id="psikologis" class="text-danger"></span>
													</div>
													<div class="col-md-2">
														<div class="radio-button radio-button-primary">
															<input id="psikologis_tenang" type="radio" name="psikologis" value="Tenang" checked>
															<label class="control-label" for="psikologis_tenang">
																Tenang
															</label>
														</div>
													</div>
													<div class="col-md-2">
														<div class="radio-button radio-button-primary">
															<input id="psikologis_marah" type="radio" name="psikologis" value="Marah">
															<label class="control-label" for="psikologis_marah">
																Marah
															</label>
														</div>
													</div>
													<div class="col-md-2">
														<div class="radio-button radio-button-primary">
															<input id="psikologis_takut" type="radio" name="psikologis" value="Takut">
															<label class="control-label" for="psikologis_takut">
																Takut
															</label>
														</div>
													</div>
													<div class="col-md-2">
														<div class="radio-button radio-button-primary">
															<input id="psikologis_cemas" type="radio" name="psikologis" value="Cemas">
															<label class="control-label" for="psikologis_cemas">
																Cemas
															</label>
														</div>
													</div>
													<div class="col-md-2">
														<div class="radio-button radio-button-primary">
															<input id="psikologis_sedih" type="radio" name="psikologis" value="Sedih">
															<label class="control-label" for="psikologis_sedih">
																Sedih
															</label>
														</div>
													</div>
													<span class="help-block"></span>
												</div>
											</div>
											<div class="form-group ">
												<div class="row">
													<div class="col-md-2">
														<label class="control-label mb-10 text-left">Sosiologi :</label>
														<span id="sosiologi" class="text-danger"></span>
													</div>
													<div class="col-md-2">
														<div class="radio-button radio-button-primary">
															<input id="sosiologi_komunikatif" type="radio" name="sosiologi" value="Komunikatif" checked>
															<label class="control-label" for="sosiologi_komunikatif">
																Komunikatif
															</label>
														</div>
													</div>
													<div class="col-md-2">
														<div class="radio-button radio-button-primary">
															<input id="sosiologi_komunikan" type="radio" name="sosiologi" value="Komunikan">
															<label class="control-label" for="sosiologi_komunikan">
																Komunikan
															</label>
														</div>
													</div>
													<div class="col-md-2">
														<div class="radio-button radio-button-primary">
															<input id="sosiologi_tidakefektif" type="radio" name="sosiologi" value="Tidak Efektif">
															<label class="control-label" for="sosiologi_tidakefektif">
																Tidak Efektif
															</label>
														</div>
													</div>
													<div class="col-md-2">
														<div class="radio-button radio-button-primary">
															<input id="sosiologi_menarik" type="radio" name="sosiologi" value="Menarik Diri">
															<label class="control-label" for="sosiologi_menarik">
																Menarik Diri
															</label>
														</div>
													</div>

													<span class="help-block"></span>
												</div>
											</div>

											<div class="form-group ">
												<div class="row">
													<div class="col-md-2">
														<label class="control-label mb-10 text-left">Ekonomi :</label>
														<span id="ekonomi" class="text-danger"></span>
													</div>
													<div class="col-md-2">
														<div class="radio-button radio-button-primary">
															<input id="ekonomi_baik" type="radio" name="ekonomi" value="Baik" checked>
															<label class="control-label" for="ekonomi_baik">
																Baik
															</label>
														</div>
													</div>
													<div class="col-md-2">
														<div class="radio-button radio-button-primary">
															<input id="ekonomi_cukup" type="radio" name="ekonomi" value="Cukup">
															<label class="control-label" for="ekonomi_cukup">
																Cukup
															</label>
														</div>
													</div>
													<div class="col-md-2">
														<div class="radio-button radio-button-primary">
															<input id="ekonomi_kurang" type="radio" name="ekonomi" value="Kurang">
															<label class="control-label" for="	ekonomi_kurang">
																Kurang
															</label>
														</div>
													</div>
													<span class="help-block"></span>
												</div>
											</div>

										</div>
									</div>


									<!----bagian ASESMEN NYERI-->
									<div class="form-group">
										<div class="col-md-12">
											<h5 style="margin-top: 30px;"><strong>
													<label class="control-label mb-10 text-left"><b>Riwayat Kesehatan
															Pasien<b /><span class="help"></span></label>
												</strong>
											</h5>
										</div>

										<div class="form-group">
											<div class="col-md-6">
												<label class="control-label mb-10 text-left"><b>Keluhan Utama <span style="color:red;">*</span>
														<b /><span class="help"></span></label>
												<span id="riwayat_error" class="text-danger"></span>
												<div class="has-success">
													<textarea class="form-control" name="" id="keluhan_utama" cols="30" rows="5">-</textarea>
													<span class="help-block"></span>
												</div>
											</div>
											<div class="form-group">

												<div class="col-md-12">
													<label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-6">
													<div class="row">
														<label class="control-label mb-10 text-left"><b>Riwayat Penyakit
																Dahulu: <b /><span class="help"></span></label>
														<span id="penyakit_past" class="text-danger"></span>
													</div>
													<div class="row">
														<div class="col-md-6">
															<div class="checkbox checkbox-primary">
																<input id="dahulu_tidakada" type="checkbox" name="penyakit_past" value="Tidak Ada" checked>
																<label class="control-label" for="dahulu_tidakada">
																	Tidak Ada
																</label>
															</div>
															<div class="checkbox checkbox-primary">
																<input id="dahulu_dm" type="checkbox" name="penyakit_past" value="DM">
																<label class="control-label" for="dahulu_dm">
																	DM
																</label>
															</div>
															<div class="checkbox checkbox-primary">
																<input id="dahulu_hipertensi" type="checkbox" name="penyakit_past" value="Hipertensi">
																<label class="control-label" for="dahulu_hipertensi">
																	Hipertensi
																</label>
															</div>
															<div class="checkbox checkbox-primary">
																<input id="dahulu_asma" type="checkbox" name="penyakit_past" value="Asma">
																<label class="control-label" for="dahulu_asma">
																	Asma
																</label>
															</div>
															<div class="checkbox checkbox-primary">
																<input id="dahulu_epilepsi" type="checkbox" name="penyakit_past" value="Epilepsi">
																<label class="control-label" for="dahulu_epilepsi">
																	Epilepsi
																</label>
															</div>
															<div class="checkbox checkbox-primary">
																<input id="dahulu_ppok" type="checkbox" name="penyakit_past" value="PPOK">
																<label class="control-label" for="	dahulu_ppok">
																	PPOK
																</label>
															</div>
														</div>
														<div class="col-md-5">
															<div class="checkbox checkbox-primary">
																<input id="dahulu_stroke" type="checkbox" name="penyakit_past" value="Stroke">
																<label class="control-label" for="dahulu_stroke">
																	Stroke
																</label>
															</div>
															<div class="checkbox checkbox-primary">
																<input id="dahulu_jantung" type="checkbox" name="penyakit_past" value="Jantung">
																<label class="control-label" for="dahulu_jantung">
																	Jantung
																</label>
															</div>
															<div class="checkbox checkbox-primary">
																<input id="dahulu_skizofrenia" type="checkbox" name="penyakit_past" value="Skizofrenia">
																<label class="control-label" for="dahulu_skizofrenia">
																	Skizofrenia
																</label>
															</div>
															<div class="checkbox checkbox-primary">
																<input id="dahulu_sle" type="checkbox" name="penyakit_past" value="SLE">
																<label class="control-label" for="dahulu_sle">
																	SLE
																</label>
															</div>
															<div class="checkbox checkbox-primary">
																<input id="dahulu_lainnya" type="checkbox" name="penyakit_past" value="Lainnya">
																<label class="control-label" for="dahulu_lainnya">
																	Lainnya :
																</label>
																<div class="has-success">
																	<input type="text" class="form-control" id="penyakit_past" value="" style="display: none;">
																</div>

															</div>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="row">
														<label class="control-label mb-10 text-left"><b>Riwayat Penyakit
																Keluarga: <b /><span class="help"></span></label>
														<span id="penyakit_keluarga" class="text-danger"></span>
													</div>
													<div class="row">
														<div class="col-md-6">
															<div class="checkbox checkbox-primary">
																<input id="keluarga_tidakada" type="checkbox" name="penyakit_keluarga" value="Tidak Ada" checked>
																<label class="control-label" for="keluarga_tidakada">
																	Tidak Ada
																</label>
															</div>
															<div class="checkbox checkbox-primary">
																<input id="keluarga_dm" type="checkbox" name="penyakit_keluarga" value="DM">
																<label class="control-label" for="keluarga_dm">
																	DM
																</label>
															</div>
															<div class="checkbox checkbox-primary">
																<input id="keluarga_hipertensi" type="checkbox" name="penyakit_keluarga" value="Hipertensi">
																<label class="control-label" for="keluarga_hipertensi">
																	Hipertensi
																</label>
															</div>
															<div class="checkbox checkbox-primary">
																<input id="keluarga_asma" type="checkbox" name="penyakit_keluarga" value="Asma">
																<label class="control-label" for="keluarga_asma">
																	Asma
																</label>
															</div>
															<div class="checkbox checkbox-primary">
																<input id="keluarga_epilepsi" type="checkbox" name="penyakit_keluarga" value="Epilepsi">
																<label class="control-label" for="keluarga_epilepsi">
																	Epilepsi
																</label>
															</div>
															<div class="checkbox checkbox-primary">
																<input id="keluarga_ppok" type="checkbox" name="penyakit_keluarga" value="PPOK">
																<label class="control-label" for="keluarga_ppok">
																	PPOK
																</label>
															</div>
														</div>
														<div class="col-md-5">
															<div class="checkbox checkbox-primary">
																<input id="keluarga_stroke" type="checkbox" name="penyakit_keluarga" value="Stroke">
																<label class="control-label" for="keluarga_stroke">
																	Stroke
																</label>
															</div>
															<div class="checkbox checkbox-primary">
																<input id="keluarga_jantung" type="checkbox" name="penyakit_keluarga" value="Jantung">
																<label class="control-label" for="keluarga_jantung">
																	Jantung
																</label>
															</div>
															<div class="checkbox checkbox-primary">
																<input id="keluarga_skizofrenia" type="checkbox" name="penyakit_keluarga" value="Skizofrenia">
																<label class="control-label" for="keluarga_skizofrenia">
																	Skizofrenia
																</label>
															</div>
															<div class="checkbox checkbox-primary">
																<input id="keluarga_sle" type="checkbox" name="penyakit_keluarga" value="SLE">
																<label class="control-label" for="keluarga_sle">
																	SLE
																</label>
															</div>
															<div class="checkbox checkbox-primary">
																<input id="keluarga_lainnya" type="checkbox" name="penyakit_keluarga" value="Lainnya">
																<label class="control-label" for="keluarga_lainnya">
																	Lainnya :
																</label>
																<div class="has-success">
																	<input type="text" class="form-control" id="penyakit_keluarga" value="" style="display: none;">
																</div>

															</div>
														</div>
													</div>
												</div>

											</div>
											<div class="form-group">

												<div class="col-md-12">
													<label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
												</div>
											</div>
											<div class="col-md-6">
												<label class="control-label mb-10 text-left"><b>Riwayat Penggunaan Obat:
														<b /><span class="help"></span></label>
												<!-- <span id="riwayat_penggunaobat" class="text-danger"></span> -->
												<div class="has-success">
													<textarea class="form-control" type="text" name="riwayat_penggunaobat" id="riwayat_penggunaobat" cols="30" rows="5">-</textarea>
													<span class="help-block"></span>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
										</div>
									</div>
									<!-- anamnesa -->
									<div class="form-group">
										<div class="col-md-6">
											<h5><strong><label class="control-label mb-10 text-left"><b>Alloanamnesa:
															<b /><span class="help"></span></label></strong></h5>
											<span class="text-danger"></span>
											<div class="has-success">
												<textarea class="form-control" type="text" name="riwayat_Alloanamnesa" id="riwayat_Alloanamnesa" cols="30" rows="5"></textarea>
											</div>
										</div>
										<div class="col-md-12">
											<label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-1">
											<h5><strong><label class="control-label mb-10 text-left"><b>Alergi:
															<b /><span class="help"></span></label></strong></h5>
											<span id="alergi_error" class="text-danger"></span>
										</div>
										<div class="col-md-2">
											<div class="radio-button radio-button-primary">
												<input id="alergi_ada" type="radio" name="alergi" value="Ada">
												<label class="control-label" for="alergi_ada">
													Ada
												</label>
												<div class="has-success">
													<input type="text" class="form-control" value="" id="alergi" style="display: none;">
												</div>
											</div>
										</div>
										<div class="col-md-2">
											<div class="radio-button radio-button-primary">
												<input id="alergi_tidakada" type="radio" name="alergi" value="Tidak Ada">
												<label class="control-label" for="alergi_tidakada">
													Tidak Ada
												</label>
											</div>
										</div>
										<div class="col-md-12">
											<label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-6">
											<h5><strong><label class="control-label mb-10 text-left"><b>Asesmen Nyeri:
															<b /><span class="help"></span></label></strong></h5>

											<div class="slidecontainer">
												<span id="val"></span>
												<input id="slide" type="range" min="0" max="10" value="0" oninput="displayValue(event)" onchange="tampilStatus(this.value)" />
												<span class="help-block"></span>
												<div id="state"><img src='<?= base_url() . 'assets/dist/img/tidak_nyeri.png'; ?>' width=7%></img>
													<br>
													<span style='color:black;'>Tidak Nyeri</span>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
										</div>
									</div>

									<!----bagian Pengkajian Risiko Jatuh-->
									<div class="form-group">
										<div class="col-md-12">
											<h5 style="margin-top: 30px;"><strong>
													<label class="control-label mb-10 text-left"><b>Pengkajian Risiko
															Jatuh<b /><span class="help"></span></label>
												</strong>
											</h5>
										</div>

										<div class="form-group ">
											<div class="col-md-12">
												<div class="col-md-12">
													<label class="control-label mb-10 text-left">
														1. Riwayat jatuh akhir-akhir ini
													</label>
													<span id="sempoyongan_error" class="text-danger"></span>
												</div>
												<div class="radio-button radio-button-primary col-md-1">
													<input id="jatuh1" type="radio" name="jatuh" value="Ya" onchange="sumScore1()">
													<label class="control-label" for="jatuh1">
														Ya
													</label>
												</div>
												<div class="radio-button radio-button-primary col-md-1">
													<input id="jatuh2" type="radio" name="jatuh" value="Tidak" onchange="sumScore1()" checked>
													<label class="control-label" for="jatuh2">
														Tidak
													</label>
													<span class="help-block"></span>
												</div>

											</div>
										</div>
										<div class="form-group ">
											<div class="col-md-12">
												<div class="col-md-12">
													<label class="control-label mb-10 text-left">
														2. Gangguan BAB/ BAK (Inkontinesia, sering ke kamar mandi)
													</label>
													<span id="sempoyongan_error1" class="text-danger"></span>
												</div>
												<div class="radio-button radio-button-primary col-md-1">
													<input id="gangguan_ba1" type="radio" name="gangguan_ba" value="Ya" onchange="sumScore1()">
													<label class="control-label" for="gangguan_ba1">
														Ya
													</label>
												</div>
												<div class="radio-button radio-button-primary col-md-1">
													<input id="gangguan_ba2" type="radio" name="gangguan_ba" value="Tidak" onchange="sumScore1()" checked>
													<label class="control-label" for="gangguan_ba2">
														Tidak
													</label>
													<span class="help-block"></span>
												</div>

											</div>
										</div>
										<div class="form-group ">
											<div class="col-md-12">
												<div class="col-md-12">
													<label class="control-label mb-10 text-left">
														3. Disorientasi / bingung
													</label>
													<span id="sempoyongan_error2" class="text-danger"></span>
												</div>
												<div class="radio-button radio-button-primary col-md-1">
													<input id="bingung1" type="radio" name="bingung" value="Ya" onchange="sumScore1()">
													<label class="control-label" for="bingung1">
														Ya
													</label>
												</div>
												<div class="radio-button radio-button-primary col-md-1">
													<input id="bingung2" type="radio" name="bingung" value="Tidak" onchange="sumScore1()" checked>
													<label class="control-label" for="bingung2">
														Tidak
													</label>
													<span class="help-block"></span>
												</div>

											</div>
										</div>
										<div class="form-group ">
											<div class="col-md-12">
												<div class="col-md-12">
													<label class="control-label mb-10 text-left">
														4. Depresi
													</label>
													<span id="sempoyongan_error3" class="text-danger"></span>
												</div>
												<div class="radio-button radio-button-primary col-md-1">
													<input id="depresi1" type="radio" name="depresi" value="Ya" onchange="sumScore1()">
													<label class="control-label" for="depresi1">
														Ya
													</label>
												</div>
												<div class="radio-button radio-button-primary col-md-1">
													<input id="depresi2" type="radio" name="depresi" value="Tidak" onchange="sumScore1()" checked>
													<label class="control-label" for="depresi2">
														Tidak
													</label>
													<span class="help-block"></span>
												</div>

											</div>
										</div>
										<div class="form-group ">
											<div class="col-md-12">
												<div class="col-md-12">
													<label class="control-label mb-10 text-left">
														5. Vertigo / pusing
													</label>
													<span id="sempoyongan_error4" class="text-danger"></span>
												</div>
												<div class="radio-button radio-button-primary col-md-1">
													<input id="pusing1" type="radio" name="pusing" value="Ya" onchange="sumScore1()">
													<label class="control-label" for="pusing1">
														Ya
													</label>
												</div>
												<div class="radio-button radio-button-primary col-md-1">
													<input id="pusing2" type="radio" name="pusing" value="Tidak" onchange="sumScore1()" checked>
													<label class="control-label" for="pusing2">
														Tidak
													</label>
													<span class="help-block"></span>
												</div>

											</div>
										</div>
										<div class="form-group ">
											<div class="col-md-12">
												<div class="col-md-12">
													<label class="control-label mb-10 text-left">
														6. Kelemahan umum, kesulitan berjalan
													</label>
													<span id="sempoyongan_error5" class="text-danger"></span>
												</div>
												<div class="radio-button radio-button-primary col-md-1">
													<input id="jalan1" type="radio" name="jalan" value="Ya" onchange="sumScore1()">
													<label class="control-label" for="jalan1">
														Ya
													</label>
												</div>
												<div class="radio-button radio-button-primary col-md-1">
													<input id="jalan2" type="radio" name="jalan" value="Tidak" onchange="sumScore1()" checked>
													<label class="control-label" for="jalan2">
														Tidak
													</label>
													<span class="help-block"></span>
												</div>

											</div>
										</div>
										<div class="form-group ">
											<div class="col-md-12">
												<div class="col-md-12">
													<label class="control-label mb-10 text-left">
														7. Pikun / demensia
													</label>
													<span id="sempoyongan_error6" class="text-danger"></span>
												</div>
												<div class="radio-button radio-button-primary col-md-1">
													<input id="pikun1" type="radio" name="pikun" value="Ya" onchange="sumScore1()">
													<label class="control-label" for="pikun1">
														Ya
													</label>
												</div>
												<div class="radio-button radio-button-primary col-md-1">
													<input id="pikun2" type="radio" name="pikun" value="Tidak" onchange="sumScore1()" checked>
													<label class="control-label" for="pikun2">
														Tidak
													</label>
													<span class="help-block"></span>
												</div>


											</div>
										</div>
										<div class="form-group ">
											<div class="col-md-12">
												<div class="col-md-12">
													<label class="control-label mb-10 text-left">
														8. Mendapat obat :
														<br>antihistamin, antihipertensi, henzodiazepines, diuretik,
														diabetik, narkotik,
														<br>psikotropik, sedative / hipnotic, vasadilator cerebral dan
														perifer antara lain :
														brainact, stugeron
														<br>neulin ps, degrium dan sebelium.
													</label>
													<span id="sempoyongan_error7" class="text-danger"></span>
												</div>


												<div class="radio-button radio-button-primary col-md-1">
													<input id="obat1" type="radio" name="obat" value="Ya" onchange="sumScore1()">
													<label class="control-label" for="obat1">
														Ya
													</label>
												</div>
												<div class="radio-button radio-button-primary col-md-1">
													<input id="obat2" type="radio" name="obat" value="Tidak" onchange="sumScore1()" checked>
													<label class="control-label" for="obat2">
														Tidak
													</label>
													<span class="help-block"></span>
												</div>

											</div>
											<div class="form-group ">
												<div class="col-md-12">
													<div class="col-md-12">
														<label class="control-label mb-10 text-left">
															9. Perawatan di ruang ICU, recovery room, prepartum
														</label>
														<span id="sempoyongan_error8" class="text-danger"></span>
													</div>
													<div class="radio-button radio-button-primary col-md-1">
														<input id="perawatan1" type="radio" name="perawatan" value="Ya" onchange="sumScore1()">
														<label class="control-label" for="perawatan1">
															Ya
														</label>
													</div>
													<div class="radio-button radio-button-primary col-md-1">
														<input id="perawatan2" type="radio" name="perawatan" value="Tidak" onchange="sumScore1()" checked>
														<label class="control-label" for="perawatan2">
															Tidak
														</label>
														<span class="help-block"></span>
													</div>

												</div>
											</div>
										</div>
										<div class="form-group ">

											<div class="col-md-8" id="score1">
											</div>
										</div>

									</div>

									<!----bagian SKRINING GIZI AWAL DEWASA  (Malnutrition Screening Tools)-->
									<div class="form-group" id="gizi_dewasa" style="display: none;">
										<div class="col-md-12">
											<h5 style="margin-top: 30px;"><strong>
													<label class="control-label mb-10 text-left"><b>SKRINING GIZI AWAL
															(Malnutrition Screening
															Tools)<b /><span class="help"></span></label>
												</strong>
											</h5>
										</div>

										<div class="form-group ">
											<div class="col-md-8">
												<label class="control-label mb-10 text-left">
													1. Apakah ada penurunan berat badan yang tidak diingikan selama 6
													bulan terakhir?
												</label>
												<span id="penurunan_bb_error" class="text-danger"></span>
												<div class="radio-button radio-button-primary">
													<input id="penurunan_bb1" type="radio" name="penurunan_bb" value="Tidak" onchange="sumScore()" checked>
													<label class="control-label" for="penurunan_bb1">
														Tidak
													</label>
												</div>
												<div class="radio-button radio-button-primary">
													<input id="penurunan_bb2" type="radio" name="penurunan_bb" value="Tidak yakin (ada tanda: baju menjadi longgar)" onchange="sumScore()">
													<label class="control-label" for="penurunan_bb2">
														Tidak yakin (ada tanda: baju menjadi longgar)
													</label>
												</div>

												<div class="radio-button radio-button-primary">
													<input id="penurunan_bb3" type="radio" name="penurunan_bb" value="Ya, ada penurunan BB sebanyak 1-5 kg" onchange="sumScore()">
													<label class="control-label" for="penurunan_bb3">
														Ada penurunan BB sebanyak 1 � 5 kg
													</label>
												</div>
												<div class="radio-button radio-button-primary">
													<input id="penurunan_bb4" type="radio" name="penurunan_bb" value="Ya, ada penurunan BB sebanyak 6-10 kg" onchange="sumScore()">
													<label class="control-label" for="penurunan_bb4">
														Ada penurunan BB sebanyak 6 � 10 kg
													</label>
												</div>
												<div class="radio-button radio-button-primary">
													<input id="penurunan_bb5" type="radio" name="penurunan_bbkurang_makan" value="Ya, ada penurunan BB sebanyak 11-15 kg" onchange="sumScore()">
													<label class="control-label" for="penurunan_bb5">
														Ada penurunan BB sebanyak 11 � 15 kg
													</label>
												</div>
												<div class="radio-button radio-button-primary">
													<input id="penurunan_bb6" type="radio" name="penurunan_bbkurang_makan" value="Ya, ada penurunan BB sebanyak >15 kg" onchange="sumScore()">
													<label class="control-label" for="penurunan_bb6">
														Ada penurunan BB sebanyak > 15 kg
													</label>
												</div>
												<div class="radio-button radio-button-primary">
													<input id="penurunan_bb7" type="radio" name="penurunan_bbkurang_makan" value="Tidak tahu berapa kg penurunannya" onchange="sumScore()">
													<label class="control-label" for="penurunan_bb7">
														Tidak tahu berapa kg penurunannya
													</label>
												</div>
											</div>
										</div>

										<br>
										<div class="form-group ">
											<div class="col-md-8">
												<label class="control-label mb-10 text-left">
													2. Apakah asupan makan menurun yang dikarenakan adanya penurunan
													nafsu makan atau kesulitan
													menerima makanan?
												</label>
												<span id="kurang_makan_error" class="text-danger"></span>
												<div class="radio-button radio-button-primary">
													<input id="kurang_makan1" type="radio" name="kurang_makan" value="Tidak" onchange="sumScore()" checked>
													<label class="control-label" for="kurang_makan1">
														Tidak
													</label>
												</div>
												<div class="radio-button radio-button-primary">
													<input id="kurang_makan2" type="radio" name="kurang_makan" value="Ya" onchange="sumScore()">
													<label class="control-label" for="kurang_makan2">
														Ya
													</label>
												</div>
											</div>
											<div class="col-md-8" id="score">
											</div>
										</div>
									</div>
									<!-- 
                              --bagian ASESMEN GIZI AWAL ANAK
                            -->
									<div class="form-group" id="gizi_anak" style="display: none;">
										<div class="col-md-12">
											<h5 style="margin-top: 30px;"><strong>
													<label class="control-label mb-10 text-left"><b>ASESMEN GIZI AWAL ANAK<b /><span class="help"></span></label>
												</strong>
											</h5>
										</div>


										<div class="form-group ">
											<div class="col-md-8">
												<label class="control-label mb-10 text-left">
													1. Apakah pasien tampak kurus:
												</label>
												<span id="kurus_error" class="text-danger"></span>
												<div class="radio-button radio-button-primary">
													<input id="kurus1" type="radio" name="kurus" value="Tidak" onchange="sumScore1()" checked>
													<label class="control-label" for="kurus1">
														Tidak
													</label>
												</div>
												<div class="radio-button radio-button-primary">
													<input id="kurus2" type="radio" name="kurus" value="Ya" onchange="sumScore1()">
													<label class="control-label" for="kurus2">
														Ya
													</label>
												</div>
											</div>
										</div>

										<div class="form-group ">
											<div class="col-md-8">
												<label class="control-label mb-10 text-left">
													2. Apakah ada penurunan BB selama 1 bulan terakhir?
													*untuk bayi Kurang dari 1 tahun BB tidak naik selama 3 bulan
												</label>
												<span id="turun_bb_error" class="text-danger"></span>
												<div class="radio-button radio-button-primary">
													<input id="turun_bb1" type="radio" name="turun_bb" value="Tidak" onchange="sumScore1()" checked>
													<label class="control-label" for="turun_bb1">
														Tidak
													</label>
												</div>
												<div class="radio-button radio-button-primary">
													<input id="turun_bb2" type="radio" name="turun_bb" value="Ya" onchange="sumScore1()">
													<label class="control-label" for="turun_bb2">
														Ya
													</label>
												</div>
											</div>
										</div>

										<div class="form-group ">
											<div class="col-md-8">
												<label class="control-label mb-10 text-left">
													3. Apakah terdapat salah satu dari kondisi di bawah ini
												</label>
												<label class="control-label mb-10 text-left">
													a. diare ≥ 5 kali/hari atau muntah >3 kali/hari dalam 1 minggu terakhir
												</label>
												<span id="diare_error" class="text-danger"></span>
												<div class="radio-button radio-button-primary">
													<input id="diare1" type="radio" name="diare" value="Tidak" onchange="sumScore1()" checked>
													<label class="control-label" for="diare1">
														Tidak
													</label>
												</div>
												<div class="radio-button radio-button-primary">
													<input id="diare2" type="radio" name="diare" value="Ya" onchange="sumScore1()">
													<label class="control-label" for="diare2">
														Ya
													</label>
												</div>
												<label class="control-label mb-10 text-left">
													b. asupan makan berkurang selama 1 mingu terakhir
												</label>
												<span id="makan_kurang_error" class="text-danger"></span>
												<div class="radio-button radio-button-primary">
													<input id="makan_kurang1" type="radio" name="makan_kurang" value="Tidak" onchange="sumScore1()" checked>
													<label class="control-label" for="makan_kurang1">
														Tidak
													</label>
												</div>
												<div class="radio-button radio-button-primary">
													<input id="makan_kurang2" type="radio" name="makan_kurang" value="Ya" onchange="sumScore1()">
													<label class="control-label" for="makan_kurang2">
														Ya
													</label>
												</div>
											</div>
										</div>

										<div class="form-group ">
											<div class="col-md-8">
												<label class="control-label mb-10 text-left">
													4. Apakah terdapat penyakit atau keadaan yang
													mengakibatkan pasien beresiko malnutrisi?
												</label>
												<span id="malnutrisi_error" class="text-danger"></span>
												<div class="radio-button radio-button-primary">
													<input id="malnutrisi1" type="radio" name="malnutrisi" value="Tidak" onchange="sumScore1()" checked>
													<label class="control-label" for="malnutrisi1">
														Tidak
													</label>
												</div>
												<div class="radio-button radio-button-primary">
													<input id="malnutrisi2" type="radio" name="malnutrisi" value="Ya" onchange="sumScore1()">
													<label class="control-label" for="malnutrisi2">
														Ya
													</label>
												</div>
											</div>
											<div class="col-md-8" id="score1">
											</div>
										</div>

									</div>

									<!----bagian Pertmubuhan Perkembangan BALITA  (Malnutrition Screening Tools)-->
									<div class="form-group" id="Perkembangan_Balita" style="display: none;">
										<div class="col-md-12">
											<h5 style="margin-top: 30px;"><strong>
													<label class="control-label mb-10 text-left"><b>PERTUMBUHAN
															PERKEMBANGAN BALITA<b /><span class="help"></span></label>
												</strong>
											</h5>
										</div>
										<div class="col-md-12">
											<h5 style="margin-top: 30px;"><strong>
													<label class="control-label mb-10 text-left"><b>Pertumbuhan</b><span class="help"></span></label>
												</strong></h5>
										</div>
										<div class="form-group ">

											<div class="form-group">
												<div class="col-md-4">
													<label class="control-label mb-10 text-left">Lahir saat usia
														kelahiran<span class="help"></span></label>
													<span class="text-danger">*</span>
													<div class="has-success">
														<input type="text" class="form-control" name="harilahir" placeholder="Bulan/Minggu">
														<span class="help-block"></span>
													</div>
												</div>
											</div>


											<div class="form-group">
												<div class="col-md-4">
													<label class="control-label mb-10 text-left">Di<span class="help"></span></label>
													<span class="text-danger">*</span>
													<div class="has-success">
														<input type="text" class="form-control" name="di_lahir" placeholder="Daerah Kelahiran">
														<span class="help-block"></span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-4">
													<label class="control-label mb-10 text-left">Di tolong<span class="help"></span></label>
													<span class="text-danger">*</span>
													<div class="has-success">
														<input type="text" class="form-control" name="tolonglahir" placeholder="Bidan/Dokter">
														<span class="help-block"></span>
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="col-md-4">
													<label class="control-label mb-10 text-left">Anak ke<span class="help"></span></label>
													<span class="text-danger">*</span>
													<div class="has-success">
														<input type="text" class="form-control" name="anaklahir" placeholder="Anak ke" value="0">
														<span class="help-block"></span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-4">
													<label class="control-label mb-10 text-left">Berat Badan Saat
														Lahir<span class="help"></span></label>
													<span class="text-danger">*</span>
													<div class="has-success">
														<input type="text" class="form-control" name="berat_badan_lahir" placeholder="Kg" value="0">
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-4">
												<label class="control-label mb-10 text-left">Tinggi Badan Saat
													Lahir<span class="help"></span></label>
												<span class="text-danger">*</span>
												<div class="has-success">
													<input type="text" class="form-control" name="tinggi_badan_lahir" placeholder="Cm" value="0">
													<span class="help-block"></span>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-4">
												<label class="control-label mb-10 text-left">Berat badan dan Tinggi
													Badan Sekarang <span class="help"></span></label>
												<span class="text-danger">*</span>
												<div class="has-success">
													<input type="text" class="form-control" name="berat_tinggi_lahir" placeholder="KG & CM" value="0 & 0">
													<span class="help-block"></span>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-4">
												<label class="control-label mb-10 text-left">Kelainan <span class="help"></span></label>
												<span class="text-danger">*</span>
												<div class="has-success">
													<input type="text" class="form-control" name="Kelainan_lahir" placeholder="Kelainan">
													<span class="help-block"></span>
												</div>
											</div>
										</div>
										<div class="form-group ">
											<div class="row">
												<div class="col-md-12">
													<h10 style="margin-top: 30px;"><strong>
															<label class="control-label mb-10 text-left"><b>Anak
																	mendapat:</b><span class="help"></span></label>
															<span id="Anak_mendapat" class="text-danger"></span>
														</strong></h10>
												</div>
												<div class="col-md-6">
													<div class="checkbox checkbox-primary">
														<input id="Anak_mendapatkan0" type="checkbox" name="Anak_mendapat" value="ASI" checked>
														<label class="control-label" for="Anak_mendapatkan0">
															ASI
														</label>
													</div>
												</div>
												<div class="col-md-6">
													<div class="checkbox checkbox-primary">
														<input id="Anak_mendapatkan1" type="checkbox" name="Anak_mendapat" value="Susu Formula">
														<label class="control-label" for="Anak_mendapatkan1">
															Susu Formula
														</label>
													</div>
												</div>
												<div class="col-md-6">
													<div class="checkbox checkbox-primary">
														<input id="Makanan_tambahan" type="checkbox" name="Anak_mendapat" value="Makanan Tambahan">
														<label class="control-label" for="Makanan_tambahan">
															Makanan Tambahan :
														</label>
														<div class="has-success">
															<input type="text" class="form-control" id="Anak_mendapat" value="" style="display: none;">
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-md-12">
											<h10 style="margin-top: 30px;"><strong>
													<label class="control-label mb-10 text-left"><b>Imunisasi:</b><span class="help"></span></label>
												</strong></h10>
										</div>
										<div class="col-md-6">
											<label class="control-label mb-10 text-left"><b>Dasar,Jenis
													imunisasi: <b /><span class="help"></span></label>
											<!-- <span id="imunisasi_dasar" class="text-danger"></span> -->
											<div class="has-success">
												<textarea class="form-control" name="imunisasi_dasar" id="imunisasi_dasar" cols="30" rows="5"></textarea>
												<span class="help-block"></span>
											</div>
										</div>

										<div class="col-md-6">
											<label class="control-label mb-10 text-left"><b>Ulang, Jenis
													Imunisasi: <b /><span class="help"></span></label>
											<!-- <span id="imunisasi_ulang" class="text-danger"></span> -->
											<div class="has-success">
												<textarea class="form-control" name="imunisasi_ulang" id="imunisasi_ulang" cols="30" rows="5"></textarea>
											</div>
										</div>
										<div class="col-md-12">
											<h5 style="margin-top: 30px;"><strong>
													<label class="control-label mb-10 text-left"><b>Perkembangan</b><span class="help"></span></label>
												</strong></h5>
										</div>
										<div class="form-group ">

											<div class="form-group">
												<div class="col-md-4">
													<label class="control-label mb-10 text-left">Umur
														Membalikan<span class="help"></span></label>
													<span class="text-danger"></span>
													<div class="has-success">
														<input type="text" class="form-control" name="umur_membalikan" placeholder="Bulan">
														<span class="help-block"></span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-4">
													<label class="control-label mb-10 text-left">Umur
														duduk<span class="help"></span></label>
													<span class="text-danger"></span>
													<div class="has-success">
														<input type="text" class="form-control" name="umur_duduk" placeholder="Bulan">
														<span class="help-block"></span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-4">
													<label class="control-label mb-10 text-left">Umur
														Berdiri<span class="help"></span></label>
													<span class="text-danger"></span>
													<div class="has-success">
														<input type="text" class="form-control" name="umur_berdiri" placeholder="Bulan">
														<span class="help-block"></span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-4">
													<label class="control-label mb-10 text-left">Umur
														Berjalan<span class="help"></span></label>
													<span class="text-danger"></span>
													<div class="has-success">
														<input type="text" class="form-control" name="umur_berjalan" placeholder="Bulan">
														<span class="help-block"></span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-4">
													<label class="control-label mb-10 text-left">Umur
														Mengoceh<span class="help"></span></label>
													<span class="text-danger"></span>
													<div class="has-success">
														<input type="text" class="form-control" name="umur_mengoceh" placeholder="Bulan">
														<span class="help-block"></span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-4">
													<label class="control-label mb-10 text-left">Umur
														Berbicara<span class="help"></span></label>
													<span class="text-danger"></span>
													<div class="has-success">
														<input type="text" class="form-control" name="umur_berbicara" placeholder="Bulan">
														<span class="help-block"></span>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<?php
									if(strtolower($jenis_kelamin)  == "perempuan")
									echo
									'<div class="form-group" id="ibu_hamil" style="display: block;">
										<div class="col-md-12">
											<h5 style="margin-top: 30px;"><strong>
													<label class="control-label mb-10 text-left"><b>KESEHATAN
															REPRODUKSI UNTUK WANITA IBU
															HAMIL<b /><span class="help"></span></label>
												</strong>
											</h5>
										</div>

										<div class="form-group">
											<div class="col-md-4">
												<label class="control-label mb-10 text-left">Usia
													menstruasi pertama<span class="help"></span></label>
												<span class="text-danger">*</span>
												<div class="has-success">
													<input type="number" class="form-control" name="usia_menstruasi" placeholder="Tahun">
													<span class="help-block"></span>
												</div>
											</div>

											<div class="col-md-4">
												<label class="control-label mb-10 text-left">Siklus
													menstruasi :interval <span class="help"></span></label>
												<span class="text-danger">*</span>
												<div class="has-success">
													<input type="number" class="form-control" name="siklus_menstruasi" placeholder="Hari">
													<span class="help-block"></span>
												</div>
											</div>
										</div>

										<div class="form-group">

											<div class="col-md-6">
												<h10 style="margin-top: 30px;"><strong>
														<label class="control-label mb-10 text-left"><b>Jumlah
																darah saat haid:</b><span class="help"></span></label>
														<span id="jumlah_darah" class="text-danger"></span>

													</strong></h10>
												<div class="radio-button radio-button-primary">
													<input id="biasa" type="radio" name="jumlah_darah" value="biasa" checked>
													<label class="control-label" for="jumlah_darah">
														Biasa
													</label>
												</div>
												<div class="cradio-button radio-button-primary">
													<input id="Banyak" type="radio" name="jumlah_darah" value="Banyak">
													<label class="control-label" for="jumlah_darah">
														Banyak
													</label>
												</div>

												<div class="radio-button radio-button-primary">
													<input id="sedikit" type="radio" name="jumlah_darah" value="Sedikit">
													<label class="control-label" for="jumlah_darah">
														Sedikit
													</label>
												</div>


											</div>

											<div class="col-md-6">
												<h10 style="margin-top: 30px;">
													<strong>
														<label class="control-label mb-10 text-left"><b>Nyeri
																Haid:</b><span class="help"></span></label>

													</strong>
												</h10>
												<div class="radio-button radio-button-primary">
													<input id="Nyeri1" type="radio" name="nyeri_haid" value="Tidak ada" checked>
													<label class="control-label" for="Nyeri1">
														Tidak ada
													</label>
												</div>
												<div class="radio-button radio-button-primary">
													<input id="Nyeri2" type="radio" name="nyeri_haid" value="Ada,skala Nyeri">
													<label class="control-label" for="Nyeri2">
														Ada,skala Nyeri
													</label>
												</div>
												<div class="radio-button radio-button-primary">
													<input id="Nyeri3" type="radio" name="nyeri_haid" value="dll">
													<label class="control-label" for="Nyeri3">
														DLL :
													</label>
													<div class="has-success">
														<input type="text" class="form-control" id="nyeri_haid" style="display: none;">
													</div>
												</div>
											</div>

										</div>

										<div class="form-group ">
											<div class="row">
												<div class="col-md-12">
													<h10 style="margin-top: 30px;">
														<strong>
															<label class="control-label mb-10 text-left"><b>Riwayat
																	Obsterik:</b><span class="help"></span></label>
														</strong>
													</h10>
												</div>
												<div class="form-group">
													<div class="col-md-4">
														<label class="control-label mb-10 text-left">G<span class="help"></span></label>
														<span class="text-danger">*</span>
														<div class="has-success">
															<input type="text" class="form-control" name="riwayat_obstrik1" placeholder="">
															<span class="help-block"></span>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-4">
														<label class="control-label mb-10 text-left">P<span class="help"></span></label>
														<span class="text-danger">*</span>
														<div class="has-success">
															<input type="text" class="form-control" name="riwayat_obstrik2" placeholder="">
															<span class="help-block"></span>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-4">
														<label class="control-label mb-10 text-left">O<span class="help"></span></label>
														<span class="text-danger">*</span>
														<div class="has-success">
															<input type="text" class="form-control" name="riwayat_obstrik3" placeholder="">
															<span class="help-block"></span>
														</div>
													</div>
													<div class="col-md-4">
														<label class="control-label mb-10 text-left">Jumlah
															anak<span class="help"></span></label>
														<span class="text-danger">*</span>
														<div class="has-success">
															<input type="number" class="form-control" name="jumlah_anak" placeholder="orang">
															<span class="help-block"></span>
														</div>
													</div>
													<div class="form-group">
														<div class="col-md-4">
															<label class="control-label mb-10 text-left">Laki-laki<span class="help"></span></label>
															<span class="text-danger">*</span>
															<div class="has-success">
																<input type="text" class="form-control" name="jumlah_anak1" placeholder="orang">
																<span class="help-block"></span>
															</div>
														</div>
														<div class="form-group">
															<div class="col-md-4">
																<label class="control-label mb-10 text-left">Perempuan<span class="help"></span></label>
																<span class="text-danger">*</span>
																<div class="has-success">
																	<input type="text" class="form-control" name="jumlah_anak2" placeholder="orang">
																	<span class="help-block"></span>
																</div>
															</div>
														</div>
													</div>
												</div>


												<div class="form-group ">
													<div class="col-md-4">
														<h10 style="margin-top: 30px;">
															<strong>
																<label class="control-label mb-10 text-left"><b>Riwayat
																		KB:</b><span class="help"></span></label>
																<span id="riwayat_kb" class="text-danger"></span>
															</strong>
														</h10>
														<div class="checkbox checkbox-primary">
															<input id="riwayat_penyakit" type="checkbox" name="riwayat_kb" value="Tidak Ada" checked>
															<label class="control-label" for="riwayat_penyakit">
																Tidak Ada
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="riwayat_penyakit" type="checkbox" name="riwayat_kb" value="Pil KB">
															<label class="control-label" for="riwayat_penyakit">
																Pil KB
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="riwayat_penyakit1" type="checkbox" name="riwayat_kb" value="Suntikan">
															<label class="control-label" for="riwayat_penyakit1">
																Suntikan
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="riwayat_penyakit2" type="checkbox" name="riwayat_kb" value="IUD">
															<label class="control-label" for="riwayat_penyakit2">
																IUD
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="riwayat_penyakit3" type="checkbox" name="riwayat_kb" value="Implant">
															<label class="control-label" for="riwayat_penyakit3">
																Implant
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="riwayat_penyakit4" type="checkbox" name="riwayat_kb" value="Kontap">
															<label class="control-label" for="riwayat_penyakit4">
																Kontap
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="riwayat_penyakit5" type="checkbox" name="riwayat_kb" value="Kondom">
															<label class="control-label" for="riwayat_penyakit5">
																Kondom
															</label>
														</div>

													</div>
												</div>

												<div class="form-group ">
													<div class="col-md-4">
														<h10>
															<strong>
																<label class="control-label mb-10 text-left"><b>Riwayat
																		penyakit
																		selama
																		kehamilan:</b><span class="help"></span></label>
																<span id="riwayat_hamil" class="text-danger"></span>
															</strong>
														</h10>
														<div class="checkbox checkbox-primary">
															<input id="riwayat_penyakit_past00" type="checkbox" name="riwayat_hamil" value="Tidak Ada">
															<label class="control-label" for="riwayat_hamil">
																Tidak Ada
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="riwayat_penyakit_past00" type="checkbox" name="riwayat_hamil" value="Hypertensi" checked>
															<label class="control-label" for="riwayat_hamil">
																Hypertensi
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="riwayat_penyakit_past1" type="checkbox" name="riwayat_hamil" value="Edema">
															<label class="control-label" for="riwayat_hamil">
																Edema
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="riwayat_penyakit_past2" type="checkbox" name="riwayat_hamil" value="ISK">
															<label class="control-label" for="riwayat_hamil">
																ISK
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="riwayat_penyakit_past3" type="checkbox" name="riwayat_hamil" value="Pendarahan">
															<label class="control-label" for="riwayat_hamil">
																Pendarahan
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="riwayat_penyakit_past4" type="checkbox" name="riwayat_hamil" value="Hiperemesis">
															<label class="control-label" for="riwayat_hamil">
																Hiperemesis
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="riwayat_penyakit_past5" type="checkbox" name="riwayat_hamil" value="Diabetes">
															<label class="control-label" for="riwayat_hamil">
																Diabetes
															</label>
														</div>
													</div>
												</div>

												<div class="form-group">

													<div class="col-md-4">
														<h10 style="margin-top: 30px;">
															<strong>
																<label class="control-label mb-10 text-left"><b>Keluhan
																		saat
																		kehamilan:</b><span class="help"></span></label>
																<span id="keluhan_hamil" class="text-danger"></span>
															</strong>
														</h10>

														<div class="radio-button radio-button-primary">
															<input id="keluhan1" type="radio" name="keluhan_hamil" value="tidak Ada">
															<label class="control-label" for="keluh1">
																tidak
																ada
															</label>

														</div>


														<div class="radio-button radio-button-primary">
															<input id="keluhan2" type="radio" name="keluhan_hamil" value="ada">
															<label class="control-label" for="keluh2">
																ada
															</label>
															<div class="has-success">
																<input type="text" class="form-control" value="" id="keluhan" style="display: none;">
															</div>
														</div>

													</div>


												</div>
												<div class="form-group">
													<div class="col-md-4">
														<h10 style="margin-top: 30px;">

															<strong>
																<label class="control-label mb-10 text-left"><b>Obat
																		yang
																		dikonsumsi
																		selama
																		kehamilan:</b><span class="help"></span></label>
																<span id="obat_hamil" class="text-danger"></span>
															</strong>
														</h10>

														<div class="radio-button radio-button-primary">
															<input id="obat_konsum1" type="radio" name="obat_hamil" value="tidak ada">
															<label class="control-label" for="obatkonsumsi1">
																tidak
																ada
															</label>
														</div>


														<div class="radio-button radio-button-primary">
															<input id="obat_konsum2" type="radio" name="obat_hamil" value="ada">
															<label class="control-label" for="obatkonsumsi2">
																ada</label>
															<div class="has-success">
																<input type="text" class="form-control" value="" id="obat_hamil" style="display: none;">
															</div>
														</div>



													</div>
												</div>
												<div class="col-md-12">
													<label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
												</div>
												<div class="form-group">
													<div class="col-md-4">
														<label class="control-label mb-10 text-left"><b>TIFUT
																<b /><span class="help"></span></label>
														<span class="text-danger"></span>
														<div class="has-success">
															<textarea class="form-control" name="riwayat_pakai_obat" id="riwayat_pakai_obat" cols="30" rows="5"></textarea>
															<span class="help-block"></span>
														</div>
													</div>
												</div>


												<div class="form-group">
													<div class="col-md-4">
														<label class="control-label mb-10 text-left"><b>USIA
																KEHAMILAN
																<b /><span class="help"></span></label>
														<span class="text-danger"></span>
														<div class="has-success">
															<textarea class="form-control" name="riwayat_pakai_obat1" id="riwayat_pakai_obat1" cols="30" rows="5"></textarea>
															<span class="help-block"></span>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-4">
														<label class="control-label mb-10 text-left"><b>HPHT
																<b /><span class="help"></span></label>
														<span class="text-danger"></span>
														<div class="has-success">
															<textarea class="form-control" name="riwayat_pakai_obat2" id="riwayat_pakai_obat2" cols="30" rows="5"></textarea>
															<span class="help-block"></span>
														</div>
													</div>
												</div>

											</div>
										</div>





										<div class="row">
											<label class="control-label mb-10 text-left"><b>Presentasi:
													<b /><span class="help"></span></label>
											<span id="presentasi_ni" class="text-danger"></span>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="checkbox checkbox-primary">
													<input id="Presentasi1" type="checkbox" name="presentasi_ni" value="Kepala" checked>
													<label class="control-label" for="presentasi_ni">
														Kepala
													</label>
												</div>
												<div class="checkbox checkbox-primary">
													<input id="Presentasi2" type="checkbox" name="presentasi_ni" value="Bokong">
													<label class="control-label" for="presentasi_ni">
														Bokong
													</label>
												</div>
												<div class="checkbox checkbox-primary">
													<input id="Presentasi3" type="checkbox" name="presentasi_ni" value="Kaki">
													<label class="control-label" for="presentasi_ni">
														Kaki
													</label>
												</div>
												<div class="checkbox checkbox-primary">
													<input id="Presentasi4" type="checkbox" name="presentasi_ni" value="Punggung">
													<label class="control-label" for="presentasi_ni">
														Punggung
													</label>
												</div>
											</div>
										</div>

									</div>';
									?>

									<div class="col-md-12">
										<div class="row">
											<h5 style="margin-top: 30px;">
												<strong>
													<label class="control-label mb-6 text-left"><b>DIAGNOSA
															KEPERAWATAN<b />
															<spanclass="help">
																</span></label>

												</strong>
											</h5>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="checkbox checkbox-primary">
													<input id="masalah_keperawatan1" type="checkbox" name="masalah_keperawatan" value="Alergi">
													<label class="control-label" for="alergi_perawatan">
														Alergi
													</label>
												</div>
												<div class="checkbox checkbox-primary">
													<input id="masalah_keperawatan2" type="checkbox" name="masalah_keperawatan" value="Nyeri">
													<label class="control-label" for="nyeri_perawatan">
														Nyeri
													</label>
												</div>
												<div class="checkbox checkbox-primary">
													<input id="masalah_keperawatan3" type="checkbox" name="masalah_keperawatan" value="Resiko
														Jatuh">
													<label class="control-label" for="resiko_perawatan">
														Resiko
														Jatuh
													</label>
												</div>
												<div class="checkbox checkbox-primary">
													<input id="masalah_keperawatan4" type="checkbox" name="masalah_keperawatan" value="Nutrisi">
													<label class="control-label" for="Nutrisi_perawat">
														Nutrisi
													</label>
												</div>
												<div class="checkbox checkbox-primary">
													<input id="masalah_keperawatan5" type="checkbox" name="masalah_keperawatan" value="Psikologis">
													<label class="control-label" for="Psikologis_perawat">
														Psikologis
													</label>
												</div>
												<div class="checkbox checkbox-primary">
													<input id="masalah_keperawatan6" type="checkbox" name="masalah_keperawatan" value="Sosial">
													<label class="control-label" for="Soial_perawatan">
														Sosial
													</label>
												</div>
												<div class="checkbox checkbox-primary">
													<input id="masalah_keperawatan7" type="checkbox" name="masalah_keperawatan" value="Lainnya">
													<label class="control-label" for="Lainnya_perawat">
														Lainnya
													</label>
													<div class="has-success">
														<input type="text" class="form-control" value="" id="masalah_keperawatan" style="display: none;">
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="form-group text-center" style="margin-top: 30px;">
												<div class="col-md-12">
													<label class="control-label mb-10 text-left">&nbsp;<span class="help"></span></label>
												</div>
											</div>

											<div class="col-md-6">
												<a class="btn btn-default btn-anim  btn-sm" onclick="javascript:history.go(-1)" style="margin-right: 20px; margin-left: 30px;"><i class="fa fa-arrow-left"></i><span class="btn-text">KEMBALI</span></a>
												<button type="submit" class="btn btn-success mb-4" onclick="simpan()">Simpan</button>
											</div>
										</div>

									</div>



								</div>

							</div>
						</div>
					</div>
				</div>
			</div>

			<script src="<?= base_url(); ?>assets/dist/js/slider.js">
			</script>
			<link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/range-slide.css">
			<script type="text/javascript">
				function tampilStatus(val) {
					if (val >= 0 && val < 1) {
						$('#state').html(
							"<img src='<?= base_url() . 'assets/dist/img/tidak_nyeri.png'; ?>'width=7%></img><br><span style='color:black;'>Tidak Nyeri</span>"
						);
					} else if (val >= 1 && val < 3) {
						$('#state').html(
							"<img src='<?= base_url() . 'assets/dist/img/nyeri_ringan.png'; ?>' width=7%></img><br><span style='color:black;'>Nyeri Ringan</span>"
						);
					} else if (val >= 3 && val < 5) {
						$('#state').html(
							"<img src='<?= base_url() . 'assets/dist/img/nyeri_sedang.png'; ?>' width=7%></img><br><span style='color:black;'>Nyeri Sedang</span>"
						);
					} else if (val >= 5 && val < 7) {
						$('#state').html(
							"<img src='<?= base_url() . 'assets/dist/img/nyeri_sedang1.png'; ?>' width=7%></img><br><span style='color:black;'>Nyeri Sedang</span>"
						);
					} else if (val >= 7 && val < 9) {
						$('#state').html(
							"<img src='<?= base_url() . 'assets/dist/img/nyeri_berat.png'; ?>' width=7%></img><br><span style='color:black;'>Nyeri Berat</span>"
						);
					} else if (val >= 9 && val <= 10) {
						$('#state').html(
							"<img src='<?= base_url() . 'assets/dist/img/nyeri_sangat_berat.png'; ?>' width=7%></img><br><span style='color:black;'>Nyeri Sangat Berat</span>"
						);
					}
				}

				// Menampilkan dan menyembunyikan teks
				$(function() {
					$("#alergi1").click(function() {
						if ($(this).is(":checked")) {
							$("#alergi").show();
						}
					});
					$("#alergi2").click(function() {
						if ($(this).is(":checked")) {
							$("#alergi").hide();
						}
					});
					$("#penyakit10").click(function() {
						if ($(this).is(":checked")) {
							$("#penyakit").show();
						} else {
							$("#penyakit").hide();
						}
					});
					$("#penyakit_past0").click(function() {
						if ($(this).is(":checked")) {
							$("#penyakit_past").show();
						} else {
							$("#penyakit_past").hide();
						}
					});
					$("#Makanan_tambahan").click(function() {
						if ($(this).is(":checked")) {
							$("#Anak_mendapat").show();
						} else {
							$("#Anak_mendapat").hide();
						}
					});
					$("#danLainlain").click(function() {
						if ($(this).is(":checked")) {
							$("#nyeri").show();
						} else {
							$("#nyeri").hide();
						}
					});
					$("#keluhan_ada").click(function() {
						if ($(this).is(":checked")) {
							$("#keluhan").show();
						} else {
							$("#keluhan").hide();
						}
					});
					$("#obat_konsum2").click(function() {
						if ($(this).is(":checked")) {
							$("#obat_konsum").show();
						} else {
							$("#obat_konsum").hide();
						}
					});

					$("#masalah_keperawatan7").click(function() {
						if ($(this).is(":checked")) {
							$("#masalah_keperawatan").show();
						} else {
							$("#masalah_keperawatan").hide();
						}
					});
					$("#Nyeri3").click(function() {
						if ($(this).is(":checked")) {
							$("#nyeri_haid").show();
						}
					});

				});

				function sumScore() {
					if ($('#penurunan_bb1').is(":checked")) {
						score = 0;
					} else if ($('#penurunan_bb2').is(":checked")) {
						score = 2;
					} else if ($('#penurunan_bb3').is(":checked")) {
						score = 1;
					} else if ($('#penurunan_bb4').is(":checked")) {
						score = 2;
					} else if ($('#penurunan_bb5').is(":checked")) {
						score = 3;
					} else if ($('#penurunan_bb6').is(":checked")) {
						score = 4;
					} else if ($('#penurunan_bb7').is(":checked")) {
						score = 2;
					}
					if ($('#kurang_makan1').is(":checked")) {
						score1 = 0;
					} else if ($('#kurang_makan2').is(":checked")) {
						score1 = 1;
					}
					sum = Number(score) + Number(score1);
					// $('#score').val(sum);
					if (sum >= 2) {
						$('#score').html(
							'<span class="text-danger"><strong>Pasien berisiko malnutrisi, konsul ke Ahli Gizi</strong></span>'
						);
					}
					if (sum < 2) {
						$('#score').html('');
					}
				}

				function sumScore1() {

					jatuh = $('input[name="jatuh"]:checked').val() == "Ya" ? 1 : 0;
					gangguan_ba = $('input[name="gangguan_ba"]:checked').val() == "Ya" ? 1 : 0;
					bingung = $('input[name="bingung"]:checked').val() == "Ya" ? 1 : 0;
					depresi = $('input[name="depresi"]:checked').val() == "Ya" ? 1 : 0;
					pusing = $('input[name="pusing"]:checked').val() == "Ya" ? 1 : 0;
					jalan = $('input[name="jalan"]:checked').val() == "Ya" ? 1 : 0;
					pikun = $('input[name="pikun"]:checked').val() == "Ya" ? 1 : 0;
					obat = $('input[name="obat"]:checked').val() == "Ya" ? 1 : 0;
					perawatan = $('input[name="perawatan"]:checked').val() == "Ya" ? 1 : 0;

					var sum = 0;
					sum = Number(jatuh) + Number(gangguan_ba) + Number(bingung) + Number(depresi) + Number(
							pusing) + Number(jalan) +
						Number(pikun) + Number(obat) + Number(perawatan);
					// $('#score').val(sum);
					if (sum >= 1) {
						$('#score1').html(
							'<span class="text-primary"><strong>Resiko Pasien Jatuh Rendah</strong></span>'
						);
					}
					if (sum >= 5) {
						$('#score1').html(
							'<span class="text-danger"><strong>Resiko Pasien Jatuh Tinggi</strong></span>'
						);
					}
					if (sum == 0) {
						$('#score1').html('');
					}

				}
				$(document).ready(function() {
					var birth = new Date('<?= $tgl_lahir ?>');
					var check = new Date();

					var milliDay = 1000 * 60 * 60 * 24; // a day in milliseconds;


					var ageInDays = (check - birth) / milliDay;

					var years = Math.floor(ageInDays / 365);
					if (years > 15) {
						$("#gizi_dewasa").show();
						$("#gizi_anak").hide();
					} else {
						$("#gizi_anak").show();
						$("#gizi_dewasa").hide();
						$('input[name="tekanan_darah"]').val(0);
					}
					if (years < 5) {
						$("#Perkembangan_Balita").show();
					} else {
						$("#Perkembangan_Balita").hide();
					}
					// alert(years);

					var agama = '<?= $agama; ?>';
					if (agama == 'ISLAM') {
						$("#spirit").show();
					} else {
						$("#spirit").hide();
					}
				});

				function simpan() {
					id_pelayanan = $('#inPel').val();
					id_history = $('#inHis').val();
					no_rm = $('#inNoRM').val();
					inJenPel = $('#inJenPel').val();



					kebutuhan_khusus = $('input[name="kebutuhan_khusus"]').val();
					tekanan_darah = $('input[name="tekanan_darah"]').val();
					suhu = $('input[name="suhu"]').val();
					frequensi_nadi = $('input[name="frequensi_nadi"]').val();
					berat_badan = $('input[name="berat_badan"]').val();
					frequensi_nafas = $('input[name="frequensi_nafas"]').val();
					tinggi_badan = $('input[name="tinggi_badan"]').val();
					berat_lahir = $('input[name="berat_lahir"]').val();
					lingkar_kepala = $('input[name="lingkar_kepala"]').val();
					lingkar_lengan = $('input[name="lingkar_lengan"]').val();

					bicara = $('input[name="bicara"]').val();
					komunikasi = $('input[name="komunikasi"]').val();
					psikologis = $('input[name="psikologis"]').val();
					sosiologi = $('input[name="sosiologi"]').val();
					ekonomi = $('input[name="ekonomi"]').val();

					keluhan_utama = $('#keluhan_utama').val();
					var penyakit_past = [];
					$('input[name="penyakit_past"]').each(function() {
						if ($(this).is(":checked")) {
							penyakit_past.push($(this).val());
						}
					});
					penyakit_past = $('#penyakit_past0').is(":checked") ? penyakit_past.toString() + ', ' + $(
							'#penyakit_past').val() :
						penyakit_past.toString();

					var penyakit_keluarga = [];
					$('input[name="penyakit_keluarga"]').each(function() {
						if ($(this).is(":checked")) {
							penyakit_keluarga.push($(this).val());
						}
					});
					penyakit_keluarga = $('#keluarga_dm').is(":checked") ? penyakit_keluarga.toString() + ', ' + $(
							'#penyakit_keluarga')
						.val() : penyakit_keluarga.toString();

					riwayat_penggunaobat = $('#riwayat_penggunaobat').val();
					alloanamnesa = $('#riwayat_Alloanamnesa').val();
					alergi = $('input[name="alergi"]').val();

					skor_nyeri = $('#slide').val();
					if (skor_nyeri >= 0 && skor_nyeri < 1) {
						skala_nyeri = 'Tidak Nyeri';
					} else if (skor_nyeri >= 1 && skor_nyeri < 3) {
						skala_nyeri = 'Ringan';
					} else if (skor_nyeri >= 3 && skor_nyeri < 5) {
						skala_nyeri = ' Sedang';
					} else if (skor_nyeri >= 5 && skor_nyeri < 7) {
						skala_nyeri = 'Sedang';
					} else if (skor_nyeri >= 7 && skor_nyeri < 9) {
						skala_nyeri = 'Berat';
					} else if (skor_nyeri >= 9 && skor_nyeri <= 10) {
						skala_nyeri = 'Sangat Berat';
					}
					jatuh = $('input[name="jatuh"]:checked').val();
					gangguan_ba = $('input[name="gangguan_ba"]:checked').val();
					bingung = $('input[name="bingung"]:checked').val();
					depresi = $('input[name="depresi"]:checked').val();
					pusing = $('input[name="pusing"]:checked').val();
					jalan = $('input[name="jalan"]:checked').val();
					pikun = $('input[name="pikun"]:checked').val();
					obat = $('input[name="obat"]:checked').val();
					perawatan = $('input[name="perawatan"]:checked').val();

					penurunan_bb = $('input[name="penurunan_bb"]:checked').val();
					kurang_makan = $('input[name="kurang_makan"]:checked').val();
					kurus = $('input[name="kurus"]:checked').val();
					turun_bb = $('input[name="turun_bb"]:checked').val();
					diare = $('input[name="diare"]:checked').val();
					makan_kurang = $('input[name="makan_kurang"]:checked').val();
					malnutrisi = $('input[name="malnutrisi"]:checked').val();


					harilahir = $('input[name="harilahir"]').val();
					di_lahir = $('input[name="di_lahir"]').val();
					tolonglahir = $('input[name="tolonglahir"]').val();
					anaklahir = $('input[name="anaklahir"]').val();
					berat_badan_lahir = $('input[name="berat_badan_lahir"]').val();
					tinggi_badan_lahir = $('input[name="tinggi_badan_lahir"]').val();
					berat_tinggi_lahir = $('input[name="berat_tinggi_lahir"]').val();
					Kelainan_lahir = $('input[name="Kelainan_lahir"]').val();

					var Anak_mendapat = [];
					$('input[name="Anak_mendapat"]').each(function() {
						if ($(this).is(":checked")) {
							Anak_mendapat.push($(this).val());
						}
					});
					Anak_mendapat = $('#Makanan_tambahan').is(":checked") ? Anak_mendapat.toString() + ', ' + $(
							'#Anak_mendapat')
						.val() : Anak_mendapat.toString();



					imunisasi_dasar = $('#imunisasi_dasar').val();
					imunisasi_ulang = $('#imunisasi_ulang').val();

					umur_membalikan = $('input[name="umur_membalikan"]').val()
					umur_duduk = $('input[name="umur_duduk"]').val()
					umur_berdiri = $('input[name="umur_berdiri"]').val()
					umur_berjalan = $('input[name="umur_berjalan"]').val()
					umur_mengoceh = $('input[name="umur_mengoceh"]').val()
					umur_berbicara = $('input[name="umur_berbicara"]').val()


					usia_menstruasi = $('input[name="usia_menstruasi"]').val()
					siklus_menstruasi = $('input[name="siklus_menstruasi"]').val()
					jumlah_darah = $('input[name="jumlah_darah"]').val();
					nyeri_haid = $('input[name="nyeri_haid"]').val();
					riwayat_obstrik1 = $('input[name="riwayat_obstrik1"]').val();
					riwayat_obstrik2 = $('input[name="riwayat_obstrik2"]').val();
					riwayat_obstrik3 = $('input[name="riwayat_obstrik3"]').val();
					jumlah_anak = $('input[name="jumlah_anak"]').val();
					jumlah_anak1 = $('input[name="jumlah_anak1"]').val();
					jumlah_anak2 = $('input[name="jumlah_anak2"]').val();
					riwayat_kb = $('input[name="riwayat_kb"]').val();
					riwayat_hamil = $('input[name="riwayat_hamil"]').val();
					keluhan_hamil = $('input[name="keluhan_hamil"]').val();
					obat_hamil = $('input[name="obat_hamil"]').val();
					riwayat_pakai_obat = $('#riwayat_pakai_obat').val();
					riwayat_pakai_obat1 = $('#riwayat_pakai_obat1').val();
					riwayat_pakai_obat2 = $('#riwayat_pakai_obat2').val();





					presentasi_ni = $('input[name="presentasi_ni"]').val();

					//masalah_keperawatan = $('input[name="masalah_keperawatan"]').val()
					var masalah_keperawatan = [];
					$('input[name="masalah_keperawatan"]').each(function() {
						if ($(this).is(":checked")) {
							masalah_keperawatan.push($(this).val());
						}
					});
					masalah_keperawatan = $('#masalah_keperawatan7').is(":checked") ? masalah_keperawatan.toString() + ', ' + $(
							'#masalah_keperawatan')
						.val() : masalah_keperawatan.toString();


						if (tekanan_darah.trim() === '' ) {
							swal({
								title: "Form Belum Lengkap!",
								text: "Pastikan Form Tekanan darah sudah diisi.",
								icon: "warning",
								confirmButtonColor: "#3cb878",
							});


							return ;
						}


						if (suhu.trim() === '' ) {
							swal({
								title: "Form Belum Lengkap!",
								text: "Pastikan Form Suhu sudah diisi.",
								icon: "warning",
								confirmButtonColor: "#3cb878",
							});


							return ;
						}


						if (frequensi_nadi.trim() === '' ) {
							swal({
								title: "Form Belum Lengkap!",
								text: "Pastikan Form Frekuensi nadi sudah diisi.",
								icon: "warning",
								confirmButtonColor: "#3cb878",
							});


							return ;
						}




						if (tinggi_badan.trim() === '' ) {
							swal({
								title: "Form Belum Lengkap!",
								text: "Pastikan Form Tinggi Badan sudah diisi.",
								icon: "warning",
								confirmButtonColor: "#3cb878",
							});


							return ;
						}


						if (lingkar_kepala.trim() === '' ) {
							swal({
								title: "Form Belum Lengkap!",
								text: "Pastikan Form Lingkar Kepala sudah diisi.",
								icon: "warning",
								confirmButtonColor: "#3cb878",
							});


							return ;
						}

						console.log("11111111");


						if (frequensi_nafas.trim() === '' ) {
							swal({
								title: "Form Belum Lengkap!",
								text: "Pastikan Form Pernafasan sudah diisi.",
								icon: "warning",
								confirmButtonColor: "#3cb878",
							});


							return ;
						}


						if (berat_badan.trim() === '' ) {
							swal({
								title: "Form Belum Lengkap!",
								text: "Pastikan Form Berat Badan  sudah diisi.",
								icon: "warning",
								confirmButtonColor: "#3cb878",
							});


							return ;
						}


						if (lingkar_lengan.trim() === '' ) {
							swal({
								title: "Form Belum Lengkap!",
								text: "Pastikan Form Lingkar Lengan sudah diisi.",
								icon: "warning",
								confirmButtonColor: "#3cb878",
							});


							return ;
						}




						if (keluhan_utama.trim() === '' ) {
							swal({
								title: "Form Belum Lengkap!",
								text: "Pastikan Form Keluhan Utama sudah diisi.",
								icon: "warning",
								confirmButtonColor: "#3cb878",
							});


							return ;
						}


						// Validasi untuk Bagian WANITA HAMIL
						if (jenis_kelamin  == "PEREMPUAN") {
							if (usia_menstruasi.trim() === '' ) {
								swal({
									title: "Form Belum Lengkap!",
									text: "Pastikan Form Keluhan Utama sudah diisi.",
									icon: "warning",
									confirmButtonColor: "#3cb878",
								});


								return ;
							}




							if (siklus_menstruasi.trim() === '' ) {
								swal({
									title: "Form Belum Lengkap!",
									text: "Pastikan Form Siklus menstruasi sudah diisi.",
									icon: "warning",
									confirmButtonColor: "#3cb878",
								});


								return ;
							}


							if (riwayat_obstrik1.trim() === '' ) {
								swal({
									title: "Form Belum Lengkap!",
									text: "Pastikan Form Riwayat Obstrik G sudah diisi.",
									icon: "warning",
									confirmButtonColor: "#3cb878",
								});


								return ;
							}


							if (riwayat_obstrik2.trim() === '' ) {
								swal({
									title: "Form Belum Lengkap!",
									text: "Pastikan Form Riwayat Obstrik P sudah diisi.",
									icon: "warning",
									confirmButtonColor: "#3cb878",
								});


								return ;
							}


							if (riwayat_obstrik3.trim() === '' ) {
								swal({
									title: "Form Belum Lengkap!",
									text: "Pastikan Form Riwayat Obstrik O sudah diisi.",
									icon: "warning",
									confirmButtonColor: "#3cb878",
								});


								return ;
							}


							if (jumlah_anak.trim() === '' ) {
								swal({
									title: "Form Belum Lengkap!",
									text: "Pastikan Form Jumlah Anak sudah diisi.",
									icon: "warning",
									confirmButtonColor: "#3cb878",
								});


								return ;
							}


							if (jumlah_anak1.trim() === '' ) {
								swal({
									title: "Form Belum Lengkap!",
									text: "Pastikan Form Jumlah Anak Laki-laki sudah diisi.",
									icon: "warning",
									confirmButtonColor: "#3cb878",
								});


								return ;
							}


							if (jumlah_anak1.trim() === '' ) {
								swal({
									title: "Form Belum Lengkap!",
									text: "Pastikan Form Jumlah Anak Perempuan sudah diisi.",
									icon: "warning",
									confirmButtonColor: "#3cb878",
								});


								return ;
							}
						}

									
					if (tekanan_darah.trim() === '' ) {
						swal({
							title: "Form Belum Lengkap!",
							text: "Pastikan Form Tekanan darah sudah diisi.",
							icon: "warning",
							confirmButtonColor: "#3cb878",
						});


						return ;
					}


					if (suhu.trim() === '' ) {
						swal({
							title: "Form Belum Lengkap!",
							text: "Pastikan Form Suhu sudah diisi.",
							icon: "warning",
							confirmButtonColor: "#3cb878",
						});


						return ;
					}


					if (frequensi_nadi.trim() === '' ) {
						swal({
							title: "Form Belum Lengkap!",
							text: "Pastikan Form Frekuensi nadi sudah diisi.",
							icon: "warning",
							confirmButtonColor: "#3cb878",
						});


						return ;
					}




					if (tinggi_badan.trim() === '' ) {
						swal({
							title: "Form Belum Lengkap!",
							text: "Pastikan Form Tinggi Badan sudah diisi.",
							icon: "warning",
							confirmButtonColor: "#3cb878",
						});


						return ;
					}


					if (lingkar_kepala.trim() === '' ) {
						swal({
							title: "Form Belum Lengkap!",
							text: "Pastikan Form Lingkar Kepala sudah diisi.",
							icon: "warning",
							confirmButtonColor: "#3cb878",
						});


						return ;
					}


					if (frequensi_nafas.trim() === '' ) {
						swal({
							title: "Form Belum Lengkap!",
							text: "Pastikan Form Pernafasan sudah diisi.",
							icon: "warning",
							confirmButtonColor: "#3cb878",
						});


						return ;
					}


					if (berat_badan.trim() === '' ) {
						swal({
							title: "Form Belum Lengkap!",
							text: "Pastikan Form Berat Badan  sudah diisi.",
							icon: "warning",
							confirmButtonColor: "#3cb878",
						});


						return ;
					}


					if (lingkar_lengan.trim() === '' ) {
						swal({
							title: "Form Belum Lengkap!",
							text: "Pastikan Form Lingkar Lengan sudah diisi.",
							icon: "warning",
							confirmButtonColor: "#3cb878",
						});


						return ;
					}




					if (keluhan_utama.trim() === '' ) {
						swal({
							title: "Form Belum Lengkap!",
							text: "Pastikan Form Keluhan Utama sudah diisi.",
							icon: "warning",
							confirmButtonColor: "#3cb878",
						});


						return ;
					}


					// Validasi untuk Bagian WANITA HAMIL
					if (jenis_kelamin  == "PEREMPUAN") {
						if (usia_menstruasi.trim() === '' ) {
							swal({
								title: "Form Belum Lengkap!",
								text: "Pastikan Form Keluhan Utama sudah diisi.",
								icon: "warning",
								confirmButtonColor: "#3cb878",
							});


							return ;
						}




						if (siklus_menstruasi.trim() === '' ) {
							swal({
								title: "Form Belum Lengkap!",
								text: "Pastikan Form Siklus menstruasi sudah diisi.",
								icon: "warning",
								confirmButtonColor: "#3cb878",
							});


							return ;
						}


						if (riwayat_obstrik1.trim() === '' ) {
							swal({
								title: "Form Belum Lengkap!",
								text: "Pastikan Form Riwayat Obstrik G sudah diisi.",
								icon: "warning",
								confirmButtonColor: "#3cb878",
							});


							return ;
						}


						if (riwayat_obstrik2.trim() === '' ) {
							swal({
								title: "Form Belum Lengkap!",
								text: "Pastikan Form Riwayat Obstrik P sudah diisi.",
								icon: "warning",
								confirmButtonColor: "#3cb878",
							});


							return ;
						}


						if (riwayat_obstrik3.trim() === '' ) {
							swal({
								title: "Form Belum Lengkap!",
								text: "Pastikan Form Riwayat Obstrik O sudah diisi.",
								icon: "warning",
								confirmButtonColor: "#3cb878",
							});


							return ;
						}


						if (jumlah_anak.trim() === '' ) {
							swal({
								title: "Form Belum Lengkap!",
								text: "Pastikan Form Jumlah Anak sudah diisi.",
								icon: "warning",
								confirmButtonColor: "#3cb878",
							});


							return ;
						}


						if (jumlah_anak1.trim() === '' ) {
							swal({
								title: "Form Belum Lengkap!",
								text: "Pastikan Form Jumlah Anak Laki-laki sudah diisi.",
								icon: "warning",
								confirmButtonColor: "#3cb878",
							});


							return ;
						}


						if (jumlah_anak1.trim() === '' ) {
							swal({
								title: "Form Belum Lengkap!",
								text: "Pastikan Form Jumlah Anak Perempuan sudah diisi.",
								icon: "warning",
								confirmButtonColor: "#3cb878",
							});


							return ;
						}
					}
					dataString = 'no_rm=' + no_rm + '&id_pelayanan=' + id_pelayanan + '&id_history=' +
						id_history + '&kebutuhan_khusus=' + kebutuhan_khusus +
						'&tekanan_darah=' + tekanan_darah + '&suhu=' + suhu +
						'&frequensi_nadi=' + frequensi_nadi +
						'&berat_badan=' + berat_badan + '&berat_lahir=' + berat_lahir +
						'&frequensi_nafas=' + frequensi_nafas +
						'&tinggi_badan=' + tinggi_badan + '&skala_nyeri=' + skala_nyeri +
						'&lingkar_kepala=' + lingkar_kepala +
						'&lingkar_lengan=' + lingkar_lengan +
						'&bicara=' + bicara + '&komunikasi=' + komunikasi +
						'&psikologis=' + psikologis +
						'&sosiologi=' + sosiologi +
						'&ekonomi=' + ekonomi +
						'&keluhan_utama=' + keluhan_utama +
						'&penyakit_past=' + penyakit_past + '&alloanamnesa=' + alloanamnesa +
						'&riwayat_penggunaobat=' + riwayat_penggunaobat +
						'&alergi=' + alergi +
						'&penyakit_keluarga=' + penyakit_keluarga +
						'&skor_nyeri=' + skor_nyeri +
						'&jatuh=' + jatuh + '&gangguan_ba=' + gangguan_ba +
						'&bingung=' + bingung +
						'&depresi=' + depresi +
						'&pusing=' + pusing + '&jalan=' + jalan +
						'&pikun=' + pikun + '&obat=' + obat +
						'&perawatan=' + perawatan +
						'&penurunan_bb=' + penurunan_bb + '&kurang_makan=' + kurang_makan +
						'&kurus=' + kurus + '&turun_bb=' + turun_bb +
						'&diare=' + diare + '&makan_kurang=' + makan_kurang +
						'&malnutrisi=' + malnutrisi +

						'&harilahir=' + harilahir +
						'&di_lahir=' + di_lahir +
						'&tolonglahir=' + tolonglahir +
						'&anaklahir=' + anaklahir +
						'&tinggi_badan_lahir=' + tinggi_badan_lahir +
						'&berat_badan_lahir=' + berat_badan_lahir +
						'&berat_tinggi_lahir=' + berat_tinggi_lahir +
						'&Kelainan_lahir=' + Kelainan_lahir +
						'&Anak_mendapat=' + Anak_mendapat +

						'&imunisasi_dasar=' + imunisasi_dasar +
						'&imunisasi_ulang=' + imunisasi_ulang +
						'&umur_membalikan=' + umur_membalikan +
						'&umur_duduk=' + umur_duduk +
						'&umur_berdiri=' + umur_berdiri +
						'&umur_berjalan=' + umur_berjalan +
						'&umur_mengoceh=' + umur_mengoceh +
						'&umur_berbicara=' + umur_berbicara +

						'&usia_menstruasi=' + usia_menstruasi +
						'&siklus_menstruasi=' + siklus_menstruasi +
						'&jumlah_darah=' + jumlah_darah +
						'&nyeri_haid=' + nyeri_haid +
						'&riwayat_obstrik1=' + riwayat_obstrik1 +
						'&riwayat_obstrik2=' + riwayat_obstrik2 +
						'&riwayat_obstrik3=' + riwayat_obstrik3 +
						'&jumlah_anak=' + jumlah_anak +
						'&jumlah_anak1=' + jumlah_anak1 +
						'&jumlah_anak2=' + jumlah_anak2 +
						'&riwayat_kb=' + riwayat_kb +
						'&riwayat_hamil=' + riwayat_hamil +
						'&keluhan_hamil=' + keluhan_hamil +
						'&obat_hamil=' + obat_hamil +
						'&riwayat_pakai_obat=' + riwayat_pakai_obat +
						'&riwayat_pakai_obat1=' + riwayat_pakai_obat1 +
						'&riwayat_pakai_obat2=' + riwayat_pakai_obat2 +



						'&presentasi_ni=' + presentasi_ni +
						'&masalah_keperawatan=' + masalah_keperawatan;

					// alert(kurus);

					$.ajax({
						url: "<?php echo base_url() ?>Erm_asesmen_awal/insert_asses_rajal",
						method: "POST",
						dataType: 'json',
						data: dataString,
						success: function(data) {
							if (data.status == "success") {
								window.location.href =
									"<?= $url ?>";
							} else if (data.error) {

								swal({
									title: "Gagal!",
									type: "warning",
									text: data.status,
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
					return false;
				}
			</script>